import{u as d,y as g,c as _,w as a,o as n,a as o,b as t,H as p,d as i,t as r,g as y,h as b,e as l,n as h,L as k,f as v}from"./app-d78bf7b1.js";import{_ as x,a as w}from"./AuntheticationIllustration-a19e212a.js";import{_ as S}from"./PrimaryButton-82810a57.js";import"./index-b6aa6c2c.js";import"./SwitchLangNavBar-896c0f0c.js";const V={class:"mb-4 text-sm text-gray-600 dark:text-gray-400"},B={key:0,class:"mb-4 font-medium text-sm text-green-600 dark:text-green-400"},L=["onSubmit"],N={class:"mt-4 flex items-center justify-between"},D={__name:"VerifyEmail",props:{status:String},setup(c){const m=c,s=d(),f=()=>{s.post(route("verification.send"))},u=g(()=>m.status==="verification-link-sent");return(e,C)=>(n(),_(x,null,{illustration:a(()=>[o(w,{type:"login",class:"w-72 h-auto"})]),default:a(()=>[o(t(p),{title:e.lang().label.email_verification},null,8,["title"]),i("div",V,r(e.lang().label.verify_email),1),t(u)?(n(),y("div",B,r(e.lang().label.verify_email_notification),1)):b("",!0),i("form",{onSubmit:v(f,["prevent"])},[i("div",N,[o(S,{class:h({"opacity-25":t(s).processing}),disabled:t(s).processing},{default:a(()=>[l(r(t(s).processing?e.lang().button.resend_email+"...":e.lang().button.resend_email),1)]),_:1},8,["class","disabled"]),o(t(k),{href:e.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800"},{default:a(()=>[l(" Log Out")]),_:1},8,["href"])])],40,L)]),_:1}))}};export{D as default};
