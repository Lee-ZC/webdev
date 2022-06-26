<html>

<head>
<script>    
function getOptions(){
    
  var x= document.getElementById("item") ; 
  var txt1 = "No. of items in dropdown list : ";
  var i;
    
    l=document.getElementById("item").length;  
    
    txt1 = txt1+l;
    
    for ( i = 0; i < x.length ; i++ )
    
      {
        txt1 = txt1 + "\n" + x.options[i].text;
      }
    
    alert(txt1);
    
}

</script>
</head>
    
<body>
    
    <form>
    Select your favorite Car :
        <select id="item">
        <option>Benz</option>
        <option>Proton</option>
        <option>Mazda</option>
        <option>Proche</option>
        </select>
    <input type="button" onclick="getOptions()" value="Count and Output all items">
    </form>
    
</body>


</html>