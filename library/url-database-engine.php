<?php
    class URLDatabaseEngine
    {
        static $mysqli;
        public static function InsertDataBase($database)
        {
            self::$mysqli = $database;
        }
        public static function GetURLObject($subdomain, $path)
        {
            $sql = "SELECT * FROM links WHERE url='".mysqli_real_escape_string(self::$mysqli,"$subdomain?$path")."' LIMIT 1";
            $result = self::$mysqli->query($sql);
            if($result === false) exit('Table/mysqli access error');
            $row = $result->fetch_assoc();
            return $row;
        }
        public static function CreateURLObject($subdomain, $path, $type = 0, $relay = "", $haveChildern = 0, $rights = 0)
        {
            $sql = "INSERT INTO links (url,type,relay,ownURLs,rights) VALUES ('".mysqli_real_escape_string(self::$mysqli,"$subdomain?$path")."',$type,'$relay',$haveChildern,$rights)";
            $result = self::$mysqli->query($sql);
            if($mysqli->errno) echo($mysqli->errno.": ".$mysqli->error);
            else return true;
            return false;
        }
        public static function SetURLObjectType($id, $type, $relay="")
        {
            $sql = "UPDATE links SET type=$type,relay='$relay' WHERE id=$id";
            $result = self::$mysqli->query($sql);
            if($mysqli->errno) echo($mysqli->errno.": ".$mysqli->error);
            else return true;
            return false;
        }
        public static function SetURLObjectOwnURLs($id, $ownURLs)
        {
            $sql = "UPDATE links SET ownURLs=$ownURLs WHERE id=$id";
            $result = self::$mysqli->query($sql);
            if($mysqli->errno) echo($mysqli->errno.": ".$mysqli->error);
            else return true;
            return false;
        }
        public static function SetURLObjectRights($id, $rights)
        {
            $sql = "UPDATE links SET rights=$rights WHERE id=$id";
            $result = self::$mysqli->query($sql);
            if($mysqli->errno) echo($mysqli->errno.": ".$mysqli->error);
            else return true;
            return false;
        }
        public static function SetURLObjectParams($id, $type, $relay, $ownURLs, $rights)
        {
            $sql = "UPDATE links SET type=$type,relay='$relay',ownURLs=$ownURLs,rights=$rights WHERE id=$id";
            $result = self::$mysqli->query($sql);
            if($mysqli->errno) echo($mysqli->errno.": ".$mysqli->error);
            else return true;
            return false;
        }
    }
?>