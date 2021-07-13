const terms = document.querySelector(".terms-and-conditions");
const termsLastElement = terms.lastElementChild;
const scrollToBottom = document.querySelector(".scroll-to-bottom");
const acceptButton = document.querySelector(".accept-button");

scrollToBottom.addEventListener("click", function(e) {
  termsLastElement.scrollIntoView({
    block: "start",
    behavior: "smooth",
    inline: "nearest"
  });
});

function obCallback(payload) {
  if (payload[0].isIntersecting) {
    scrollToBottom.setAttribute("aria-hidden", true);
    acceptButton.setAttribute("aria-hidden", false);
    observer.unobserve(termsLastElement);
  }
}

const observer = new IntersectionObserver(obCallback, { root: terms, threshold: 0.1 });

observer.observe(termsLastElement);
