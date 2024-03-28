function showAdminDashboard() {
    document.getElementById('main-content').style.display = 'block';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
}
function showresidentsRecord() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'block';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
}
function showRequestedDocuments() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'block';
    document.getElementById('showpublicNews').style.display = 'none';
}
function showpublicnews() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'block';
}
function showofficials() {
    document.getElementById('main-content').style.display = 'none';
    document.getElementById('ResidentRecord').style.display = 'none';
    document.getElementById('showRequestedDocuments').style.display = 'none';
    document.getElementById('showpublicNews').style.display = 'none';
    document.getElementById('showBrgyOfficials').style.display = 'block';

}
