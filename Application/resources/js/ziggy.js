const Ziggy = {
    url: "http://localhost:8000",
    port: 8000,
    defaults: {},
    routes: {
        index: { uri: "/", methods: ["GET", "HEAD"] },
        cadastro: { uri: "cadastro", methods: ["GET", "HEAD"] },
        "cadastro.action": { uri: "cadastro", methods: ["POST"] },
        login: { uri: "login", methods: ["GET", "HEAD"] },
        "login.action": { uri: "login", methods: ["POST"] },
        logout: { uri: "logout", methods: ["GET", "HEAD"] },
        testevue: { uri: "testevue", methods: ["GET", "HEAD"] },
        home: { uri: "home", methods: ["GET", "HEAD"] },
        testeblades: { uri: "testeblades", methods: ["GET", "HEAD"] },
        getListaDisciplinas: { uri: "disciplinas", methods: ["GET", "HEAD"] },
        "password.request": {
            uri: "forgot-password",
            methods: ["GET", "HEAD"],
        },
        "password.email": { uri: "forgot-password", methods: ["POST"] },
        "password.reset": {
            uri: "reset-password/{token}",
            methods: ["GET", "HEAD"],
            parameters: ["token"],
        },
        "password.update": { uri: "reset-password", methods: ["POST"] },
    },
};

if (typeof window !== "undefined" && typeof window.Ziggy !== "undefined") {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
