function toggleDropdown() {
    const userMenu = document.querySelector('.user-menu'); // Select the user menu element
    userMenu.classList.toggle('active'); // Toggle the 'active' class to show/hide the menu
}


// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.user-icon')) {   // Check if the click target is not the user icon
        const dropdowns = document.querySelectorAll('.dropdown');  // Select all dropdown elements
        dropdowns.forEach(dropdown => {
            dropdown.parentElement.classList.remove('active');  // Remove 'active' class from parent elements
        });
       
    }
}