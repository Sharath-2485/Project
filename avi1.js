function itemclick(obj){
    var val=obj.value;
    var val1=obj.name;
    const itemc=document.getElementById("itembox");
    const itemc1=document.getElementById("price");
    console.log("hyyi");
    itemc.value=val;
    itemc1.value=val1;
}
function openForm(){
    document.getElementById("prebill").style.display="block";
}
function closeForm(){
    document.getElementsById("prebill").style.display="none";
}