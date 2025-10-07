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

<div class="classRoomNumArea">
    <?php
    //教室数表示のためのループ
    for ($j = 0; $j < 9; $j++) {
        $classRoomNum = 100 + ($i + 1) * 10 + $j + 1;
        //↓ここで鍵が開いているかを判定する予定
        if($j % 2 == 0){
    ?>
    <button id="room-<?php echo $classRoomNum;?>" class="classRoomSafe"><?php echo $classRoomNum; ?>教室</button>
    <?php }else{ ?>
    <button class="classRoomDanger"><?php echo $classRoomNum; ?>教室</button>
    <br />
    <?php 
    }
    }
    ?>
</div>

<?php
}
?>
</div>
<script>
    //後でここにGASのWebアプリURLを入れる
    const GAS_URL = "";

    //スプレッドシートからデータを取得
    async function loadData(){
        try{
            const response = await fetch(GAS_URL);
            const data = await response.json();

            //dataは例えば[{ KeyID: "A1", ClassRoom: "101", Locked: "true" }, ...] の形式
            data.forEach(item =>{
                const btn = document.getElementById(`room-${item.ClassRoom}`);
                if(!btn)return;
                
                if(item.Locked === "true" ){
                    btn.classList.add("classRoomSafe");
                    btn.classList.remove("classRoomDanger");
                }else{
                    btn.classList.add("classRoomDanger");
                    btn.classList.remove("classRoomSafe");
                }
            });
        }catch (e){
            console.error("データの取得に失敗しました:",e);

        }    
    }
    //ページ読み込み時実行
    loadData();
    </script>
</body>
</html>