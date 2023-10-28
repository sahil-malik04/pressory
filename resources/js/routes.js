import{Home, About, Contact, FAQs, Articles, Authors, Publications, 
        Fallacies, SignUp , SearchModule, Article, Author, Publication,
        Login, Forgot_password_step1, Forgot_username_step1, HowTo, Donate, ErrorPage}
        from './components';

const routes = [
  {path:'*', component:ErrorPage},
  {name:'home', path:'/', component:Home},
  {name:'about', path:'/about', component:About},
  {name:'contact', path:'/contact', component:Contact},
  {name:'faqs', path:'/faqs', component:FAQs},
  {name:'howTo', path:'/how-to', component:HowTo},
  {name:'donate', path:'/donate', component:Donate},

  // listing components
  {name:'articles', path:'/articles', component:Articles},
  {name:'authors', path:'/authors', component:Authors},
  {name:'publications', path:'/publication', component:Publications},
  {name:'fallacies', path:'/fallacies', component:Fallacies},

  // login and signup
  {name:'signup', path:'/signup', component:SignUp},
  {name:'login', path:'/login', component:Login},
  {name:'forgotPasswordStep1', path:'/forgot_password_step1', component:Forgot_password_step1},
  {name:'forgotUsernameStep1', path:'/forgot_username_step1', component:Forgot_username_step1},

  // search component
  {name:'searchComp', path:'/search', component:SearchModule},

  // preview components
  {name:'article', path:'/article/:id/:name', component: Article, props: true},

  {name:'author', path:'/author/:id/:name', component: Author, props: true},

  {name:'publication', path:'/publication/:id/:name', component: Publication, props: true},
];

export default routes