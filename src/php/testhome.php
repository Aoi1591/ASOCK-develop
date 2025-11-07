<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" href="../css/home.css">
</head>
<body>
<div class="area">
        <!-- ★テスト用の教室 -->
        <div id="room-test" class="classRoomSafe">
           <div class="classRoomName">
             test教室
           </div>
        </div>

    </div>
    <script src="home.js"></script>

<script>
    //GASのWebアプリURL(最新のURLに更新が必要)   
    const GAS_URL ="https://script.google.com/macros/s/AKfycbxg-CLqpfk4UAdcy3zTASBxfotLEO4W5oW69agRvn3t6FJWsIwcdfMn9t7506iWYHNG/exec";

    //スプレッドシートからデータを取得
    async function loadData(){
        try{
            //fetch.jsに処理を記入してるためfetch.jsから引っ張ってくる処理
            const response = await fetch(GAS_URL);
            const data = await response.json();

            //dataは例えば[{ KeyID: "A1", ClassRoom: "101", Locked: "true" }, ...] の形式
            data.forEach(item => {
    console.log(item.ClassRoom, item.Locked); // ←追加
    const btn = document.getElementById(`room-${item.ClassRoom}`);
    if(!btn) return;

    if(item.Locked === true || item.Locked === "true" || item.Locked === "TRUE"){
        btn.classList.add("classRoomSafe");
        btn.classList.remove("classRoomDanger");
    } else {
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