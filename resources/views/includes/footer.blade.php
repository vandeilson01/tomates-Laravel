<footer class="absolute w-full bottom-0 bg-blueGray-800 pb-6">
    <div class="container mx-auto px-4">
      <hr class="mb-6 border-b-1 border-blueGray-600" />
      <div
        class="flex flex-wrap items-center md:justify-between justify-center"
      >
        <div class="w-full md:w-4/12 px-4">
          <div
            class="text-sm text-white font-semibold py-1 text-center md:text-left"
          >
            Copyright © <span id="get-current-year"></span>
          </div>
        </div>
        <div class="w-full md:w-8/12 px-4">
          <ul
            class="flex flex-wrap list-none md:justify-end justify-center"
          >
            <li>
              <a
                href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-login"
                class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
                >MIT License</a
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</section>
</main>
</body>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script>
/* Make dynamic date appear */
(function () {
if (document.getElementById("get-current-year")) {
  document.getElementById(
    "get-current-year"
  ).innerHTML = new Date().getFullYear();
}
})();
/* Function for opning navbar on mobile */
function toggleNavbar(collapseID) {
document.getElementById(collapseID).classList.toggle("hidden");
document.getElementById(collapseID).classList.toggle("block");
}
/* Function for dropdowns */
function openDropdown(event, dropdownID) {
let element = event.target;
while (element.nodeName !== "A") {
  element = element.parentNode;
}
Popper.createPopper(element, document.getElementById(dropdownID), {
  placement: "bottom-start",
});
document.getElementById(dropdownID).classList.toggle("hidden");
document.getElementById(dropdownID).classList.toggle("block");
}
</script>
</body>
</html>