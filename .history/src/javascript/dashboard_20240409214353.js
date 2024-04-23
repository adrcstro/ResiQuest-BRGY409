// Using ES6 import syntax
import Swal from 'sweetalert2';

// Using CommonJS require syntax
const Swal = require('sweetalert2');
Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      );
    }
  });
  
//admin dashbaord js script
function showAdminDashboard() {
    document.getElementById('main-content').style.display = 'block';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'none';
}
function showresidentsRecord() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'block';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'none';
}
function showRequestedDocuments() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'block';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'none';
}
function showpublicnews() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'block';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'none';
}
function showofficials() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'block';
    document.getElementById('showMessage').style.display = 'none';

}

function showMessage() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'block';
}













//residents dashbaord js script



function showResidetsDashboard() {
    document.getElementById('ResidentsDashboard').style.display = 'block';
    document.getElementById('ResidentPersonalProfile').style.display = 'none';
    document.getElementById('ResidentsDocumentsRequested').style.display = 'none';
    document.getElementById('ResidentsNotofication').style.display = 'none';
    document.getElementById('ResidentsBarangayOfficails').style.display = 'none';
    document.getElementById('ResidentsMessage').style.display = 'none';
}
function showPersonalProfile() {
    document.getElementById('ResidentsDashboard').style.display = 'none';
    document.getElementById('ResidentPersonalProfile').style.display = 'block';
    document.getElementById('ResidentsDocumentsRequested').style.display = 'none';
    document.getElementById('ResidentsNotofication').style.display = 'none';
    document.getElementById('ResidentsBarangayOfficails').style.display = 'none';
    document.getElementById('ResidentsMessage').style.display = 'none';
}
function showDocumentRequested() {
    document.getElementById('ResidentsDashboard').style.display = 'none';
    document.getElementById('ResidentPersonalProfile').style.display = 'none';
    document.getElementById('ResidentsDocumentsRequested').style.display = 'block';
    document.getElementById('ResidentsNotofication').style.display = 'none';
    document.getElementById('ResidentsBarangayOfficails').style.display = 'none';
    document.getElementById('ResidentsMessage').style.display = 'none';
}
function showNotification() {
    document.getElementById('ResidentsDashboard').style.display = 'none';
    document.getElementById('ResidentPersonalProfile').style.display = 'none';
    document.getElementById('ResidentsDocumentsRequested').style.display = 'none';
    document.getElementById('ResidentsNotofication').style.display = 'block';
    document.getElementById('ResidentsBarangayOfficails').style.display = 'none';
    document.getElementById('ResidentsMessage').style.display = 'none';
}
function showResidentsbrgyOfficials() {
    document.getElementById('ResidentsDashboard').style.display = 'none';
    document.getElementById('ResidentPersonalProfile').style.display = 'none';
    document.getElementById('ResidentsDocumentsRequested').style.display = 'none';
    document.getElementById('ResidentsNotofication').style.display = 'none';
    document.getElementById('ResidentsBarangayOfficails').style.display = 'block';
    document.getElementById('ResidentsMessage').style.display = 'none';

}

function showResidentsMessage() {
    document.getElementById('ResidentsDashboard').style.display = 'none';
    document.getElementById('ResidentPersonalProfile').style.display = 'none';
    document.getElementById('ResidentsDocumentsRequested').style.display = 'none';
    document.getElementById('ResidentsNotofication').style.display = 'none';
    document.getElementById('ResidentsBarangayOfficails').style.display = 'none';
    document.getElementById('ResidentsMessage').style.display = 'block';
}




//loginsignup



function showsignup() {
    document.getElementById('login').style.display = 'none';
    document.getElementById('signup').style.display = 'block';
  

}

function showlogin() {
    document.getElementById('login').style.display = 'block';
    document.getElementById('signup').style.display = 'none';
   
}




// Initialization for ES Users
