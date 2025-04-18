const testimonials = [
  { text: "From the moment we walked in, everything felt perfect — the lighting, the music, the scent of fresh food in the air. Each dish was a delight, and the service made us feel right at home. Can’t wait to come back!", author: "- Lloyd-san" },
  { text: "I miss, I love, money", author: "- neD" },
  { text: "An amazing dining experience! The ambiance is cozy and inviting, the food is bursting with flavor, and the staff are incredibly friendly. Definitely a place I'd love to return to!", author: "- Eric" }
];

let currentIndex = 0;
const nextBtn = document.getElementById("next"),
    prevBtn = document.getElementById("prev"),
    testimonialText = document.getElementById("testimonial-text"),
    testimonialAuthor = document.getElementById("author");

const updateTestimonial = () => {
  if (testimonialText && testimonialAuthor) {
      testimonialText.textContent = testimonials[currentIndex].text;
      testimonialAuthor.textContent = testimonials[currentIndex].author;
  }
};

nextBtn?.addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % testimonials.length;
  updateTestimonial();
});

prevBtn?.addEventListener("click", () => {
  currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
  updateTestimonial();
});

updateTestimonial();
