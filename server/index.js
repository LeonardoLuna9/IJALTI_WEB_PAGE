const express = require("express");
const PORT = process.env.PORT || 3001;
const app = express();
var mysql = require("mysql");
const Connection = require("mysql/lib/Connection");

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "Jp.092302",
  database: "pagina_web",
});


con.connect(function (err) {
  if (err) throw err;
  console.log("connected");
});

app.post("/iniciosesion/:Usuario/:Contra",function(req,res){
  con.query("INSERT INTO usuarios (CURP,correo,nombre,apellidoP,apellidoM,contraseña) VALUES ('"+req.params.Usuario+"','"+req.params.Contra+"','asdfad','asdf','asdfa','ads')", function (err, result) {
    if (err) throw err;
    console.log("record bien");
  });
});

app.listen(PORT, () => {
  console.log(`Server listening on ${PORT}`);
});

