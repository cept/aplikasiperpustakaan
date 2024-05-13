function dataUser(){
            
    table.innerHTML = ""
    contactList = JSON.parse(localStorage.getItem('listDataUser')) ?? []

    contactList.forEach(function (value, i){
       
        var table = document.getElementById('table')

        table.innerHTML += `
            <tr>
                <td>${i+1}</td>
                <td>${i+1}</td>
                <td>${value.div}</td>
                <td>${value.name}</td>
                <td>${value.email}</td>
                <td>${value.telpon}</td>
                <td>${value.role}</td>
                <td>
                    <a href ="edituser.html?id=${value.id}" class="btn btn-sm btn-primary">
                    Edit
                    </a>
                    <button class="btn btn-sm btn-danger" onclick="hapusUser(${value.id})">Hapus</button>
                </td>
            </tr>`
    })
}

function simpanUser(){
    
    contactList = JSON.parse(localStorage.getItem('listDataUser')) ?? []
    var id
    contactList.length != 0 ? contactList.findLast((item) => id = item.id) : id = 0

    if(document.getElementById('id').value){

        contactList.forEach(value => {
            if(document.getElementById('id').value == value.id){
                value.div           = document.getElementById('div').value, 
                value.name          = document.getElementById('name').value, 
                value.email         = document.getElementById('email').value, 
                value.pw            = document.getElementById('pw').value
                value.cpw           = document.getElementById('cpw').value
                value.telpon        = document.getElementById('telpon').value
                value.role          = document.getElementById('role').value
            }
        });

        document.getElementById('id').value = ''

    }else{

        var item = {
            id          : id + 1, 
            div         : document.getElementById('div').value, 
            name        : document.getElementById('name').value, 
            email       : document.getElementById('email').value, 
            pw          : document.getElementById('pw').value,
            cpw         : document.getElementById('cpw').value,
            telpon      : document.getElementById('telpon').value,
            role        : document.getElementById('role').value
        }
        contactList.push(item)
    }

    localStorage.setItem('listDataUser', JSON.stringify(contactList))

    dataUser()

    document.getElementById('form').reset()
}

function editUser(){
    var url = document.URL
    console.log(url);
    var par = new URLSearchParams(document.location.search);
    var parID = par.get("id");
    console.log(parID);
    contactList = JSON.parse(localStorage.getItem('listDataUser'))
    var item = contactList.find(item => item.id == (parID));
    $('#id').val(item.id);
    $('#div').val(item.div);
    $('#name').val(item.name);
    $('#email').val(item.email);
    $('#pw').val(item.pw);
    $('#cpw').val(item.cpw);
    $('#telpon').val(item.telpon);
    $('#role').val(item.role);
}


function hapusUser(id){
    contactList = JSON.parse(localStorage.getItem('listDataUser')) ?? []

    tanya = confirm("Apakah Anda Yakin Akan Menghapus Data Ini?")
    if(tanya){
        contactList = contactList.filter(function(value){ 
            return value.id != id; 
        });  
    }

    localStorage.setItem('listDataUser', JSON.stringify(contactList))
    
    dataUser()
}