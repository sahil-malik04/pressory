module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/js/components/*.vue",
    "./resources/js/components/layout/*",
    "./resources/js/components/listing_components/*.vue",
    "./resources/js/components/login-signup/*.vue",
    "./resources/js/components/result_preview/*.vue",
    "./resources/js/components/search_module/*.vue",
    

  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
]
}