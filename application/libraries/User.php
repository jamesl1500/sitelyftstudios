<?php

/*
 * uVibe.com , Copyright 2014 All rights Reserved
 * @author James Latten
 * @desc uVibe file
 * This file is not to be givin to anyone else
 */

/**
 * This library is going to be used to get data for a specific user
 *
 * @author james latten
 */
class User extends Database
{
    /**
     * This will get all the users informatio nand return it with a query
     * @param $query The array thats gonna be sent back
     */
    public static function getUserBasicInformation($users_id)
    {
        $database = new Database();

        if (empty($users_id) != true && is_numeric($users_id) == true) {
            $query = $database->prepare("SELECT * FROM users WHERE user_id='$users_id' AND activated='1'");
            $query->execute();

            return $query;
        }
    }

    static public function get($table, $uid, $column)
    {
        if ($table != "" && $uid != "" && $column != "") {
            $db = new Database;

            // Fetch whatever
            $query = $db->prepare("SELECT " . $column . " FROM " . $table . " WHERE user_id='" . $uid . "'");
            $query->execute();

            // Check
            return $query->fetch(PDO::FETCH_OBJ)->$column;
        } else {
            die('Missing Data');
        }
    }

    static public function checkActivationStatus($uid)
    {
        if ($uid != "") {
            $db = new Database;

            // Chech status
            $query = $db->prepare("SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $uid . "'");
            $query->execute();

            if ($query->rowCount() == 1) {
                return $query->fetch(PDO::FETCH_OBJ)->activated;
            } else {
                return false;
            }
        }
    }

    static public function checkExists($uid)
    {

        if ($uid != "") {
            $db = new Database;

            // Chech status
            $query = $db->prepare("SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $uid . "'");
            $query->execute();

            return $query->rowCount();
        }
    }

    static public function checkStatusDot($uid)
    {
        if (!empty($uid) && is_numeric($uid) && self::checkExists($uid) == 1) {
            $db = new Database;

            // Get last login
            $query = $db->prepare("SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $uid . "'");
            $query->execute();

            if ($query->rowCount() == 1) {
                $fetch = $query->fetch(PDO::FETCH_ASSOC);
                $last_login = $fetch['last_login'];
                $then = $last_login;
                $then = new DateTime($then);

                $now = new DateTime();

                $sinceThen = $then->diff($now);

                //Combined
                if ($sinceThen->h >= 1) {
                    return 0;
                } else {
                    return 1;
                }
            }
        }
    }

    static public function changeStatus($uid)
    {
        if (!empty($uid) && is_numeric($uid)) {
            $db = new Database;

            $query = $db->prepare("UPDATE " . USERS_TABLE . " SET last_login=now() WHERE user_id='" . $uid . "'");
            $query->execute();

            return false;
        }
    }

    /*//---
        This will display a user mod
    --//*/
    static public function makeUserMod($uid)
    {
        if (!empty($uid) && is_numeric($uid) && self::checkExists($uid) == 1) {
            $db = new Database;

            $query = $db->prepare("SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $uid . "' AND activated='1'");
            $query->execute();

            if ($query->rowCount() > 0) {
                $fetch = $query->fetch(PDO::FETCH_ASSOC);

                $user_id = $fetch['user_id'];
                $firstname = $fetch['first_name'];
                $lastname = $fetch['last_name'];
                $bio = $fetch['bio'];
                $status = $fetch['status'];
                $username = $fetch['username'];
                $profile_pic = $fetch['profile_pic'];
                $salt = $fetch['unique_salt_id'];
                ?>
                <div class="userLister clearfix" id="userMod<?php echo $user_id; ?>" style="padding: 5px;">
                    <div class="profilePicLeft" style="float: left;">
                        <div style="background-image: url(<?php echo User::renderProfilePic($user_id); ?>); background-size: cover;width: 50px;height: 50px;border-radius: 5px;"></div>
                    </div>
                    <div class="rightPerson" style="margin-left: 65px;font-size: 14px;float: none;">
                        <h3 style="font-size: 14px;"><a class="user_full_mod_hover" data-id='<?php echo $user_id; ?>'
                                                        href="<?php echo APP_URL; ?>profile/<?php echo $username; ?>"><?php echo ucwords($firstname); ?> <?php echo ucwords($lastname); ?></a>
                        </h3>

                        <p style="margin-top: 0px;font-size:18px;padding-top: 2px;margin-bottom: 2px;"><?php echo $bio; ?></p>
                        <?php
                        if (isset($_SESSION['uid'])) {
                            Friends::renderFriendshipBtnForMod($user_id, $_SESSION['uid']);
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
        }
    }

    static public function checkStatus($uid)
    {
        if (!empty($uid) && is_numeric($uid) && self::checkExists($uid) == 1) {
            $db = new Database;

            // Get last login
            $query = $db->prepare("SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $uid . "'");
            $query->execute();

            if ($query->rowCount() == 1) {
                $fetch = $query->fetch(PDO::FETCH_ASSOC);
                $last_login = $fetch['last_login'];
                $then = $last_login;
                $then = new DateTime($then);

                $now = new DateTime();

                $sinceThen = $then->diff($now);

                //Combined
                if ($sinceThen->h >= 1) {
                    echo "<font color='#e74c3c'>Offline</font>";
                } else {
                    echo "<font color='#2ecc71'>Online</font>";
                }
            }
        }
    }

    static public function checkStatusNumber($uid)
    {
        if (!empty($uid) && is_numeric($uid) && self::checkExists($uid) == 1) {
            $db = new Database;

            // Get last login
            $query = $db->prepare("SELECT * FROM " . USERS_TABLE . " WHERE user_id='" . $uid . "'");
            $query->execute();

            if ($query->rowCount() == 1) {
                $fetch = $query->fetch(PDO::FETCH_ASSOC);
                $last_login = $fetch['last_login'];
                $then = $last_login;
                $then = new DateTime($then);

                $now = new DateTime();

                $sinceThen = $then->diff($now);

                //Combined
                return $sinceThen->h;
            }
        }
    }

    static public function renderProfilePic($uid, $useThumbnail = 0)
    {
        if(!empty($uid))
        {
            $profilepic = User::get('users', $uid, 'profile_pic');
            $salt = User::get('users', $uid, 'unique_salt_id');

            if(file_exists(SITE_ROOT . DS . 'public' . DS . 'user_data' . DS . $salt . DS . 'profile_pictures' . DS . $profilepic)) {
                if($useThumbnail == 0) {
                    return APP_URL . 'user_data/' . User::get(USERS_TABLE, $uid, 'unique_salt_id') . '/profile_pictures/' . $profilepic;
                }else{
                    if(file_exists(SITE_ROOT . DS . 'public' . DS . 'user_data' . DS . $salt . DS . 'profile_pictures/thumb' . $useThumbnail . '.' . $profilepic)){
                        return APP_URL . 'user_data/' . User::get(USERS_TABLE, $uid, 'unique_salt_id') . '/profile_pictures/thumb' . $useThumbnail . '.' . $profilepic;
                    }else{
                        return APP_URL . 'user_data/' . User::get(USERS_TABLE, $uid, 'unique_salt_id') . '/profile_pictures/' . $profilepic;
                    }
                }
            }else{
                return APP_URL . 'user_data/default_pic.jpg';
            }
        }else{
            return APP_URL . 'user_data/default_pic.jpg';
        }
    }
}
