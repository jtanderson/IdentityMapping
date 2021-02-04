import * as Quill from 'quill';
window.Quill = require('quill');
//import Toolbar from 'quill/modules/toolbar';
//import Snow from 'quill/themes/snow';
//import Bold from 'quill/formats/bold';
//import Italic from 'quill/formats/italic';
//import Header from 'quill/formats/header';


//Quill.register({
  //'modules/toolbar': Toolbar,
  //'themes/snow': Snow,
  //'formats/bold': Bold,
  //'formats/italic': Italic,
  //'formats/header': Header
//});

let div = document.getElementById('editor');
let quill = new Quill(div);


window.onload = function() {
  console.log("HERE");
}
