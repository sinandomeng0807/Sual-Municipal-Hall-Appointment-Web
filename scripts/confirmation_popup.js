function confirmSignOut() {
    let confirmAction = confirm("Are you sure you want to sign out?");
    if (confirmAction) {
        window.location.href = 'HFID.html';
    }
}
