//function bling(){
//    alert("bling");
//}

//alert("Hello, world!");


function biggerPimp() {
    var Text = document.getElementById('Textarea');
    //var FontSize = Text.style.fontSize;

    Text.style.fontSize = "24pt";
}

function Bling(){
    alert("Bling is Checked");
    var BlingButton = document.getElementById('Bling');
    var Text = document.getElementById('Textarea');
    if(BlingButton.checked==true){
        Text.style.color = 'green';
        Text.style.fontWeight = 'Bold';
        Text.style.textDecoration = 'underline';
    } else {
        Text.style.color = 'black';
        Text.style.fontWeight = 'normal';
        Text.style.textDecoration = 'none';
    }
}

function Snoopify(){
    var SnoopifyUppercase = document.getElementById('Snoopify');
    var Text = document.getElementById('Textarea');
    Text.style.textTransform = 'uppercase';
}