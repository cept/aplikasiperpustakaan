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