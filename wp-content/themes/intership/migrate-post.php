<?php
//Code for K2-items migration to WP-posts
//author: Oleg Holovin, Vova Kaiun
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'intership-project' . DIRECTORY_SEPARATOR . 'wp-config.php');
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'intership-project' . DIRECTORY_SEPARATOR . '..' . '/wp-includes/load.php';
ini_set('max_execution_time', 0);
global $wpdb;
$mydb = new wpdb('root', '', 'boat-race', '127.0.0.1');
$rows = $mydb->get_results("
SELECT ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, 
ping_status, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, 
post_type, post_mime_type, comment_count
FROM wp_posts
LEFT JOIN wp_posts ON wp_posts

SELECT meta_id, post_id, meta_key, meta_value
FROM wp_postmeta
LEFT JOIN wp_postmeta ON wp_postmeta");
$categories = [];
foreach ($rows as $row) {
    if (in_array($row->name, $categories)) {
        $imageName = md5('Image' . $row->id);//This how joomla fetches images
        $imagePath = '10.0.5.201/img' . $imageName . '.jpg';//fetching full image name
        preg_match_all('/<img.*src\s*=\s*"(.*)"/Usm', $row->fulltext, $imgTxt, PREG_SET_ORDER);//for fetching images from the content
        foreach ($imgTxt as $arrImg) {
            $imageTxtPath = '10.0.5.201/intership-project/' . $arrImg[1];
        }
        $postJoomlaId = $row->id;
        $postTitle = $row->title;
        $postAlias = $row->alias;
        $postStatus = $row->published;
        $postAuthor = $row->created_by_alias;
        $postDate = $row->publish_up;
        $postContent = $row->fulltext;
        $postCategory = $row->name;
        $catId = $row->catid;
        $userArray = [];
        $catArray = [];
        $wp_upload_dir = wp_upload_dir();//path to upload directory
        $postArgs = array(
            'post_author' => $userArray[$postAuthor],
            'post_content' => $postContent,
            'post_title' => $postTitle,
            'post_status' => 'publish',
            'post_type' => 'post',
            'post_category' => array($catArray[$postCategory]),
            'post_date' => $postDate
        );
        if (!isset($catArray[$postCategory])) {
            $postArgs['post_category'] = [15];//if category not found - set a default category. or ignore this and category will be set to "Uncategoeized"
        }
        foreach ($imgTxt as $arrImg) {
            $imageTxtPath = '/Users/evgeny/Sites/img' . $arrImg[1];
            /* Source File URL */
            $remote_file_url = '/Users/evgeny/Sites/intership-project/wp-content/uploads' . $arrImg[1];
            /* New file name and path for this file */
            $local_file = $wp_upload_dir['path'] . '/' . basename($imageTxtPath);
            /* Copy the file from source url to server */
            if (file_exists($remote_file_url)) {
                $copy = copy($remote_file_url, $local_file);
                //inserting into DB
                $args = array('guid' => $wp_upload_dir['url'] . '/' . basename($local_file), 'post_mime_type' => 'image/jpeg', 'post_status' => 'publish');
                $attId = wp_insert_attachment($args, $local_file);
                $attach_data = wp_generate_attachment_metadata($attId, $local_file);
                wp_update_attachment_metadata($attId, $attach_data);
                $url = wp_get_attachment_url($attId);
                $postContent = str_replace($arrImg[1], $url, $postContent);
            }
        }
        $postArgs['post_content'] = $postContent;
        $postId = wp_insert_post($postArgs);
        /*Featured image*/
        $featured = '/Users/evgeny/Sites/intership-project/wp-content/uploads' . $imageName . '.jpg';
        $local = $wp_upload_dir['path'] . '/' . basename($imageName) . '.jpg';
        if (file_exists($featured)) {
            $cp = copy($featured, $local);
            $argsThumb = array('guid' => $wp_upload_dir['url'] . '/' . basename($local) . '.jpg', 'post_mime_type' => 'image/jpeg');
            $thumbId = wp_insert_attachment($argsThumb, $local);
            $attach = wp_generate_attachment_metadata($thumbId, $local);
            wp_update_attachment_metadata($thumbId, $attach);
            $result = set_post_thumbnail($postId, $thumbId);
        }
    }
}
echo('success');//just checking if it works =)