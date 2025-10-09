<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" href="../css/Home.css">
</head>
<body>
<div class="area">
<?php
//階数表示のためのループ
for ($i = 0; $i < 7 ;$i++) {
?>

<div class="floorNumArea">
    <span name="floorNum" class="floorNum"><?php echo $i + 1; ?>階</span>
</div>

<div class="classRoomNumArea1">
    <div class="classRoomNumArea2">
    <?php
    //教室数表示のためのループ
    for ($j = 0; $j < 9; $j++) {
        $classRoomNum = 100 + ($i + 1) * 10 + $j + 1;
        //↓ここで鍵が開いているかを判定する予定
        if($j % 2 == 0){
    ?>
    <div class="classRoomSafe">
        <div class="adminClassRoom">
            <?php echo $classRoomNum; ?>教室
        </div>
        <div class="udButton">
            <button class="classUpdate">編集</button>
            <button class="classDelete">削除</button>
        </div>
    </div>
    <?php }else{ ?>
    <div class="classRoomDanger">
        <div class="adminClassRoom">
            <?php echo $classRoomNum; ?>教室
        </div>
        <div class="udButton">
            <button class="classUpdate">編集</button>
            <button class="classDelete">削除</button>
        </div>
    </div>
    <?php 
    }
    if($j % 2 == 1){
    ?>
    </div><div class="classRoomNumArea2">
    <?php
    }
    }
    ?>
    </div>
</div>

<?php
}
?>
</div>
</body>
</html>