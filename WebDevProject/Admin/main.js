fetch('server2.php').then((res)=> res.json())
    .then(response=>{
        
        console.log(response);
        let output = ''; 
        
        for(let i in response){
            output += ` <tr>
                <td>${response[i].id}</td>
                <td>${response[i].username}</td>
                <td>${response[i].email}</td>
                <td>${response[i].password}</td>
                <td>${response[i].usertype}</td>
            </tr> ` ;
        }

    document.querySelector('.tbody').innerHTML = output ; 
}).catch(error=> console.log(error));


$(document).ready(function(){
   $('.mydatatable').DataTable();
})