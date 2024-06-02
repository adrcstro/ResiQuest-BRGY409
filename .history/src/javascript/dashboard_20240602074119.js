
function showAdminDashboard() {
    document.getElementById('main-content').style.display = 'block';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'none';
    document.getElementById('ManageBlotterReports').style.display = 'none';
}
function showresidentsRecord() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'block';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'none';
    document.getElementById('ManageBlotterReports').style.display = 'none';
}
function showRequestedDocuments() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'block';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'none';
    document.getElementById('ManageBlotterReports').style.display = 'none';
}
function showpublicnews() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'block';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'none';
    document.getElementById('ManageBlotterReports').style.display = 'none';
}
function showofficials() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'block';
    document.getElementById('showMessage').style.display = 'none';
    document.getElementById('ManageBlotterReports').style.display = 'none';

}

function showMessage() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'block';
    document.getElementById('ManageBlotterReports').style.display = 'none';
}


function showBlotterreport() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'none';
    document.getElementById('showMessage').style.display = 'none';
    document.getElementById('ManageBlotterReports').style.display = 'block';
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




//admin request tables

function showPendingrequest() {
    document.getElementById('Pendingrequesttable').style.display = 'block';
    document.getElementById('Onprocessrequesttable').style.display = 'none';
    document.getElementById('Completedrequesttable').style.display = 'none';
   
}


function showOnprocessrequest() {
    document.getElementById('Pendingrequesttable').style.display = 'none';
    document.getElementById('Onprocessrequesttable').style.display = 'block';
    document.getElementById('Completedrequesttable').style.display = 'none';
   
}

function showCompleterequest() {
    document.getElementById('Pendingrequesttable').style.display = 'none';
    document.getElementById('Onprocessrequesttable').style.display = 'none';
    document.getElementById('Completedrequesttable').style.display = 'block';
   
}


//admin blotter tables


function showPendingComplaint() {
    document.getElementById('PendingBlottertable').style.display = 'block';
    document.getElementById('OnprocessBlotter').style.display = 'none';
    document.getElementById('CompleteBlottertable').style.display = 'none';
}

function showonprocessComplaint() {
    document.getElementById('PendingBlottertable').style.display = 'none';
    document.getElementById('OnprocessBlotter').style.display = 'block';
    document.getElementById('CompleteBlottertable').style.display = 'none';
}


function showOnscheduleComplaint() {
    document.getElementById('PendingBlottertable').style.display = 'none';
    document.getElementById('OnprocessBlotter').style.display = 'none';
    document.getElementById('CompleteBlottertable').style.display = 'block';
}










//admin scheduleing sysrtem
function showsetschedule() {
    document.getElementById('showSetschedule').style.display = 'block';
    document.getElementById('showfuturechedule').style.display = 'none';
    document.getElementById('showtodayschedule').style.display = 'none';
    document.getElementById('showoverduechedule').style.display = 'none';
}
function showfutureschedule() {
    document.getElementById('showSetschedule').style.display = 'none';
    document.getElementById('showfuturechedule').style.display = 'block';
    document.getElementById('showtodayschedule').style.display = 'none';
    document.getElementById('showoverduechedule').style.display = 'none';
}
function showtodayschedule() {
    document.getElementById('showSetschedule').style.display = 'none';
    document.getElementById('showfuturechedule').style.display = 'none';
    document.getElementById('showtodayschedule').style.display = 'block';
    document.getElementById('showoverduechedule').style.display = 'none';
}
function showoverduechedule() {
    document.getElementById('showSetschedule').style.display = 'none';
    document.getElementById('showfuturechedule').style.display = 'none';
    document.getElementById('showtodayschedule').style.display = 'none';
    document.getElementById('showoverduechedule').style.display = 'block';
}



//admin scheduleing sysrtem for blotter

function showsetBlotterschedule() {
    document.getElementById('BlotterSetschedule').style.display = 'block';
    document.getElementById('BlotterFutureSchedule').style.display = 'none';
    document.getElementById('TodaysScheduleBlotter').style.display = 'none';
   
}
function showfutureBlotterschedule() {
    document.getElementById('BlotterSetschedule').style.display = 'none';
    document.getElementById('BlotterFutureSchedule').style.display = 'block';
    document.getElementById('TodaysScheduleBlotter').style.display = 'none';
  
}
function Displayblotterschedtoday() {
    document.getElementById('BlotterSetschedule').style.display = 'none';
    document.getElementById('BlotterFutureSchedule').style.display = 'none';
    document.getElementById('TodaysScheduleBlotter').style.display = 'block';
   
}



