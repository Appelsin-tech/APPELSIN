module.exports = {
  chainWebpack: config => {

    config.module.rule("vue").
      use("vue-svg-inline-loader").
      loader("vue-svg-inline-loader")

    config
    .plugin('copy')
    .tap(args => {
      return [[
        {
          from: './src/assets/.htaccess',
          to: '[name].[ext]'
        },
        {
          from: 'favicon.png',
          to: '[name].[ext]'
        },
        {
          from: './mail.php',
          to: '[name].[ext]'
        },
        {
          from: './robots.txt',
          to: '[name].[ext]'
        },
        {
          from: './sitemap.xml',
          to: '[name].[ext]'
        },
        {
          from: './pageimage.jpg',
          to: '[name].[ext]'
        },
        {
          from: './logo.png',
          to: '[name].[ext]'
        },
      ]]
    })
  },

  css: {
    modules: true,
  },

  lintOnSave: false,
  baseUrl: undefined,
  outputDir: undefined,
  assetsDir: undefined,
  runtimeCompiler: undefined,
  productionSourceMap: false,
  parallel: undefined,

  pluginOptions: {
    i18n: {
      locale: 'en',
      fallbackLocale: 'ru',
      localeDir: 'locales',
      enableInSFC: false
    }
  }
}

var smartgrid = require('smart-grid');

/* It's principal settings in smart grid project */
var settings = {
  outputStyle: 'less', /* less || scss || sass || styl */
  columns: 12, /* number of grid columns */
  offset: '20px', /* gutter width px || % || rem */
  mobileFirst: false, /* mobileFirst ? 'min-width' : 'max-width' */
  container: {
    maxWidth: '1170px', /* max-width оn very large screen */
    fields: '20px' /* side fields */
  },
  breakPoints: {
    xxl: {
      width: '1920px', /* -> @media (max-width: 1100px) */
    },
    xl: {
      width: '1500px', /* -> @media (max-width: 1100px) */
    },
    lg: {
      width: '1170px',
    },
    md: {
      width: '990px'
    },
    sm: {
      width: '750px',
    },
    xs: {
      width: '425px',
      fields: '10px',
      offset: '10px'
    }
    /*
    We can create any quantity of break points.

    some_name: {
        width: 'Npx',
        fields: 'N(px|%|rem)',
        offset: 'N(px|%|rem)'
    }
    */
  }
};

smartgrid('./src/assets/less', settings);
