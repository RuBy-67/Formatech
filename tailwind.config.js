/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./Pages/*", "./Templates/*", "./Layouts/*"],
    theme: {
        container: {
            center: true,
        },
        extend: {
            colors: {
                black: "#354A54",
                white: "#f3f3f3",
                lightGrey: "#99AEBA",
                darkGrey: "#2C2C2C",
                primary: "#A9DEF9",
                secondary: "#E0A5D8",
            },
            fontSize: {
                h1: "56px",
                h2: "48px",
                h3: "40px",
                h4: "32px",
                h5: "24px",
                h6: "18px",
                base: "16px",
                xs: "11px",
            },

            fontFamily: {
                title: ["Barlow", "sans-serif"],
                text: ["Roboto", "sans-serif"],
            },
            backgroundImage: {
                "top-banner": "url('/Assets/images/quantic_computers_01.png')",
            },
        },
    },
    plugins: [],
};
