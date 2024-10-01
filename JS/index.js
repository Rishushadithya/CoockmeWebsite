function click() {

if (!confirm("Please login to the site")) {
    document.write('<a href="login.php" class="btn">Log In</a> <a href="#" class="btn">Cancel</a>');
}
}


document.querySelectorAll('.recipe-link').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        alert('Please login to the site to view recipes');
    });
});