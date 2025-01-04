// Check the stored value for isLoggedin (default to false if not set)
let isLoggedin = JSON.parse(localStorage.getItem('isLoggedin')) || false;

// Function to toggle x value and change dropdown visibility
function toggleDropdownVisibility() {
  isLoggedin = !isLoggedin; // Toggle the boolean value of x
  
  // Store the updated value in localStorage
  localStorage.setItem('isLoggedin', JSON.stringify(isLoggedin));

  const dropdownMenu = document.getElementsByClassName("dropdown")[0]; // Get the first element with class 'dropdown'
  
  if (dropdownMenu) {
    // Show or hide the dropdown based on the value of x
    if (isLoggedin) {
      dropdownMenu.style.display = "inline-block"; // Show the dropdown
    } else {
      dropdownMenu.style.display = "none"; // Hide the dropdown
    }
  }
}

// Apply the initial state based on localStorage when the page loads
window.onload = function() {
  const dropdownMenu = document.getElementsByClassName("dropdown")[0];
  
  if (dropdownMenu) {
    // Show or hide the dropdown based on the stored state
    if (isLoggedin) {
      dropdownMenu.style.display = "inline-block"; // Show the dropdown
    } else {
      dropdownMenu.style.display = "none"; // Hide the dropdown
    }
  }
};
