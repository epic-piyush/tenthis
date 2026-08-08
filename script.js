function close_msg(id){
    document.getElementById(id).style.display="none";
    }
function copy(id){
    var copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
    document.getElementById("copy").innerHTML='<font size="3">Copied</font>';
}