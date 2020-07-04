<?
    include "./lib.php";

    $member = new SqlQuery("member1");
    $member->select();

    print_r($member->excuteRow());

    $member->connectClose();
?>
