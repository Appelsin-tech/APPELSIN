import Vue from 'vue'
import VueI18n from 'vue-i18n'

Vue.use(VueI18n)

function loadLocaleMessages () {
  const locales = require.context('./locales', true, /[A-Za-z0-9-_,\s]+\.json$/i)
  const messages = {}
  locales.keys().forEach(key => {
    const matched = key.match(/([A-Za-z0-9-_]+)\./i)
    if (matched && matched.length > 1) {
      const locale = matched[1]
      messages[locale] = locales(key)
    }
  })
  return messages
}

function userLang() {
  let lang = 'en'
  let browserLang = ''
  if (localStorage.lang) {
    lang = localStorage.lang;
    return lang
  } else {
    browserLang = window.navigator.language
    localStorage.setItem('lang', browserLang)
    return browserLang
  }
}

export default new VueI18n({
  locale: userLang(),
  fallbackLocale: process.env.VUE_APP_I18N_FALLBACK_LOCALE || 'en',
  messages: loadLocaleMessages()
})
