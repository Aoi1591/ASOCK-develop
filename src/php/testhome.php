<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" href="../css/Home.css">
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
<script>
    //GASのWebアプリURL
    const GAS_URL = "https://discordapp.com/channels/@me/1151361053159071755/1426017822592729111";

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