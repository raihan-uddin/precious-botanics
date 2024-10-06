

const slider = document.getElementById('slider');
if (slider !== null) {
    const images = slider.children;
    const totalImages = images.length;
    let currentIndex = 0;

    function updateSlider() {
        const offset = -currentIndex * 100; // Move to the correct image
        slider.style.transform = `translateX(${offset}%)`;
    }

    document.getElementById('next').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalImages;
        updateSlider();
    });

    document.getElementById('prev').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalImages) % totalImages;
        updateSlider();
    });
}

// if lightslider is loaded
if (typeof lightSlider !== 'undefined') {
    $(document).ready(function () {
    $('#autoWidth').lightSlider({
        autoWidth: true,
        loop: true,

    });
});
$(document).ready(function () {
    $('#autoWidth-1').lightSlider({
        autoWidth: true,
        loop: true,
    });
});

$(document).ready(function () {
    $('#autoWidth-2').lightSlider({
        autoWidth: true,
        loop: true,
    });
});

}

function showTab(tabId, element) {
    // Hide all tab panes
    document.querySelectorAll('.tab-pane').forEach(tab => {
        tab.classList.add('hidden');
    });

    // Show the clicked tab's content
    document.getElementById(tabId).classList.remove('hidden');

    // Remove active class from all tabs
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active', 'border-b-[1px]', 'border-blue-500'); // Customize the border color
        tab.style.color = ''; // Reset text color
    });

    // Set active class on the clicked tab
    element.classList.add('active', 'border-b-[1px]', 'border-black'); // Customize the border color
    element.style.color = '#9FD62E'; // Change the text color for active tab
}
