// fetch.js
const fetch = (...args) => import('node-fetch').then(({ default: fetch }) => fetch(...args));
//GASのWebアプリURL(最新のURLに更新が必要)  
const GAS_URL = "https://script.google.com/macros/s/AKfycbxg-CLqpfk4UAdcy3zTASBxfotLEO4W5oW69agRvn3t6FJWsIwcdfMn9t7506iWYHNG/exec";
async function getData() {
    try {
        const response = await fetch(GAS_URL);
        const text = await response.text(); // ← まずテキストとして取得！
        console.log("🔹GAS Response Raw Text:\n", text);

        // JSONに変換できるか試す
        let data;
        try {
            data = JSON.parse(text);
        } catch (err) {
            throw new Error("JSONとして解析できません: " + err.message);
        }

        console.log("🔹Parsed JSON:\n", JSON.stringify(data, null, 2));

    } catch (err) {
        console.log(JSON.stringify({ error: "GAS取得エラー", details: err.message }));
    }
}

// 直接 Node.js で実行する場合
if (require.main === module) {
    getData().then(() => process.exit(0));
}

// 他のモジュールから呼び出せるようにエクスポート
module.exports = { getData };
