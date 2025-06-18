// for stats in the fourth section
const counters = document.querySelectorAll(".fourth_section_box.stats span");  // Updated selector
const container = document.querySelector(".fourth_section_box.stats");  // Updated container
// variable that tracks if the counters have been activated
let activated = false;

// add scroll event to the page
window.addEventListener("scroll", () => {
    // if page is scrolled to the container's element and the counters are not activated
    if (pageYOffset > container.offsetTop - container.offsetHeight - 200 && activated === false) {
        // select all counters
        counters.forEach(counter => {
            // set counter values to zero
            counter.innerText = 0;
            // set count variable to track the count
            let count = 0;
            // update count function
            function updateCount() {
                // get counter target number to count to (parse the number without commas)
                const target = parseInt(counter.dataset.count.replace(/,/g, ''), 10);  // Remove commas
                // as long as the count is below the target number
                if (count < target) {
                    // increment the count
                    count++;
                    // set the counter text to the count
                    counter.innerText = count;
                    // repeat this every 10 milliseconds for most counters
                    let speed = 10;  // Default speed

                    // Make the "Successful Graduates" counter faster (adjust speed as needed)
                    if (counter.dataset.count === "6,663") {
                        speed = 5;  // Faster increment speed
                    }

                    // Repeat with the adjusted speed
                    setTimeout(updateCount, speed); 
                } else {
                    // And when the target is reached
                    counter.innerText = target;
                }
            }
            // run the function initially
            updateCount();
            // set activated to true
            activated = true;
        });
    }
    // if the page is scrolled back a certain amount or to the top and activated is true
    else if ((pageYOffset < container.offsetTop - container.offsetHeight - 500 || pageYOffset === 0) && activated === true) {
        // select all counters
        counters.forEach(counter => {
            // set counter text back to zero
            counter.innerText = 0;
        });
        // set activated to false
        activated = false;
    }
});


// for blogs
function getBlogParam() {
    const params = new URLSearchParams(window.location.search);
    return params.get('blog');
}

function showCorrectBlog() {
    const blogId = getBlogParam();
    if (blogId) {
        const blogSection = document.getElementById('blog-' + blogId);
        if (blogSection) {
        blogSection.style.display = 'block';
        } else {
        document.body.innerHTML = '<h2 style="text-align: center;">Blog not found 😢</h2>';
        }
}
}

const blogData = {
    1: {
        title: "Small Devices, Big Impact: How Energy-Saving Gadgets Reduce Carbon Emissions",
        image: "blogImages/blog1.jpg"
    },
    2: {
        title: "What Is Carbon Tracking and Why Should You Care?",
        image: "blogImages/blog2.jpg"
    },
    3: {
        title: "Can Buying Energy-Efficient Products Really Help the Planet?",
        image: "blogImages/blog3.jpg"
}
};

function updateBanner() {
    const blogId = getBlogParam();
    const banner = document.querySelector('.banner');
    const bannerText = document.querySelector('.banner-text');

    if (blogData[blogId]) {
        banner.style.setProperty('--bg-url', `url(${blogData[blogId].image})`);
        bannerText.textContent = blogData[blogId].title;
    } else {
        banner.style.setProperty('--bg-url', 'url(blogImages/default.jpg)');
        bannerText.textContent = 'Blog Not Found';
    }
}

// ✅ Call both functions in one onload
window.onload = function () {
    updateBanner();
    showCorrectBlog();
};