// Get the toggle switch element
const toggleSwitch = document.querySelector('.switch input');

// Add event listener to toggle dark mode
toggleSwitch.addEventListener('change', () => {
    document.body.classList.toggle('dark-mode');
    document.querySelector('.navbar').classList.toggle('dark-mode');
    document.querySelectorAll('.navbar-menu a').forEach((link) => {
        link.classList.toggle('dark-mode');
    });
    document.querySelector('.hero-section').classList.toggle('dark-mode');
    document.querySelector('.about-container').classList.toggle('dark-mode');
    document.querySelectorAll('.ticket-container').forEach((el) => {
        el.classList.toggle('dark-mode');
    });
    document.querySelectorAll('.form-container').forEach((el) => {
        el.classList.toggle('dark-mode');
    });
    document.querySelector('footer').classList.toggle('dark-mode');
    
    // Optionally save the mode to localStorage
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
});

// Load saved theme from localStorage
window.onload = function() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        document.querySelector('.navbar').classList.add('dark-mode');
        document.querySelectorAll('.navbar-menu a').forEach((link) => {
            link.classList.add('dark-mode');
        });
        document.querySelector('.hero-section').classList.add('dark-mode');
        document.querySelector('.about-container').classList.add('dark-mode');
        document.querySelectorAll('.ticket-container').forEach((el) => {
            el.classList.add('dark-mode');
        });
        document.querySelectorAll('.form-container').forEach((el) => {
            el.classList.add('dark-mode');
        });
        document.querySelector('footer').classList.add('dark-mode');
        toggleSwitch.checked = true; // Set the switch to be checked
    }
}
