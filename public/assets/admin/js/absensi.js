function dataAbsen(){
            
    table.innerHTML = ""
    contactList = JSON.parse(localStorage.getItem('listAbsen')) ?? []

    contactList.forEach(function (value, i){
       
        var table = document.getElementById('table')

        table.innerHTML += `
            <tr>
                <td>${i+1}</td>
                <td>${value.jadwal}</td>
                <td>${value.date}</td>
                <td>${value.loc}</td>
                <td>${value.lampiran}</td>
                <td>${value.ket}</td>
                <td>${i+1}</td>
            </tr>`
    })
}

function simpanAbsen(){
    
    contactList = JSON.parse(localStorage.getItem('listAbsen')) ?? []
    var id
    contactList.length != 0 ? contactList.findLast((item) => id = item.id) : id = 0

    if(document.getElementById('id').value){

        contactList.forEach(value => {
            if(document.getElementById('id').value == value.id){
                value.jadwal       = document.getElementById('jadwal').value,
                value.date         = document.getElementById('date').value, 
                value.loc          = document.getElementById('loc').value, 
                value.lampiran     = document.getElementById('lampiran').value,
                value.ket          = document.getElementById('ket').value

            }
        });

        document.getElementById('id').value = ''

    }else{

        var item = {
            id          : id + 1, 
            jadwal      : document.getElementById('jadwal').value,
            date        : document.getElementById('date').value, 
            loc         : document.getElementById('loc').value, 
            lampiran    : document.getElementById('lampiran').value,
            ket         : document.getElementById('ket').value
            
        }
        contactList.push(item)
    }

    localStorage.setItem('listAbsen', JSON.stringify(contactList))

    dataAbsen()

    document.getElementById('form').reset()
}

// function find(){
//     var url = document.URL
//     console.log(url);
//     var par = new URLSearchParams(document.location.search);
//     var parID = par.get("id");
//     console.log(parID);
//     contactList = JSON.parse(localStorage.getItem('listEeg'))
//     var item = contactList.find(item => item.id == (parID));
//     $('#id').val(item.id);
//     $('#id_pasien').val(item.id_pasien);
//     $('#sesi').val(item.sesi);
//     $('#dokumem').val(item.dokumen);
//     $('#deskripsi').val(item.deskripsi);
// }

// function detailEeg(){
//     var url = document.URL
//     console.log(url);
//     var par = new URLSearchParams(document.location.search);
//     var parID = par.get("id");
//     console.log(parID);
//     contactList = JSON.parse(localStorage.getItem('listEeg'))
//     var item = contactList.find(item => item.id == (parID));
//     $('#id').val(item.id);
//     $('#id_pasien').val(item.id_pasien);
//     $('#deskripsi').val(item.deskripsi);
//     $('#dokumem').val(item.dokumen);
   
// }

// function hapusData(id){
//     contactList = JSON.parse(localStorage.getItem('listEeg')) ?? []

//     tanya = confirm("Apakah Anda Yakin Akan Menghapus Data Ini?")
//     if(tanya){
//         contactList = contactList.filter(function(value){ 
//             return value.id != id; 
//         });  
//     }

//     localStorage.setItem('listEeg', JSON.stringify(contactList))
    
//     allEeg()
// }