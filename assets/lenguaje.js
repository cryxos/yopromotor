
(function (namespace) {
    namespace = namespace.Lenguaje = {};
    var LENGUAJE = [ 
       
        'Achuar',
        'Aimara',
        'Amahuaca',
        'Arabela',
        'Ashaninka',
        'Awajún',
        'Bora',
        'Capanahua',
        'Cashinahua',
        'Cauqui',
        'Chamicuro',
        'Ese eja',
        'Harakbut',
        'Iñapari',
        'Iquitu',
        'Isconahua',
        'Jaqaru',
        'Kakataibo',
        'Kakinte -caquinte-',
        'Kandozi–chapra',
        'Kukama–kukamiria',
        'Madija -culina-',
        'Maijuna',
        'Matsigenka',
        'Matses',
        'Muniche',
        'Murui-muinani',
        'Nanti',
        'Nomatsigenga',
        'Ocaina',
        'Omagua',
        'Quechua',
        'Resígaro',
        'Secoya',
        'Sharanahua2',
        'Shawi',
        'Shipibo-konibo',
        'Shiwilu',
        'Taushiro',
        'Tikuna (ticuna)',
        'Urarina',
        'Wampis',
        'Yagua',
        'Yaminahua3',
        'Yanesha',
        'Yine',
        'Yora (nahua)'
    ];

    namespace.getLenguaje = function () {
        var out = [];
        // 25 Regiones
        for (var i = 0; i < 47; i++) {
            out.push({ lenguaje: i + 1, text: LENGUAJE[i] });
        }
        return out;
    };
})(window);