import{O as x,u as S,y as w,g as p,a as o,w as u,o as f,d as i,b as a,F as C,D as $,e as _,n as V,t as E,f as j,h as N,C as B}from"./app-366dc743.js";import{_ as m,a as F,b as h}from"./TextInput-3ad62ff1.js";import{_ as D,a as O}from"./SecondaryButton-f49b8710.js";import{_ as U}from"./PrimaryButton-c6519ddc.js";import{_ as M}from"./Checkbox-98e0923f.js";const q={class:"space-y-6"},z=["onSubmit"],A=i("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Edit role ",-1),L={class:"my-6 space-y-4"},P={class:"flex justify-start items-center space-x-2 mt-2"},R={class:"grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 mt-2"},T=["id","value"],G={class:"flex justify-end"},W={__name:"Edit",props:{show:Boolean,role:Object,permissions:Object},emits:["close"],setup(v,{emit:c}){const t=v,n=x({multipleSelect:!1}),e=S({name:"",permissions:[]}),g=()=>{var r;e.put(route("role.update",(r=t.role)==null?void 0:r.id),{preserveScroll:!0,onSuccess:()=>{c("close"),e.reset(),n.multipleSelect=!1},onError:()=>null,onFinish:()=>null})};w(()=>{var r,s,l;t.show&&(e.name=(r=t.role)==null?void 0:r.name,e.permissions=(s=t.role.permissions)==null?void 0:s.map(d=>d.id)),t.permissions.length==((l=t.role)==null?void 0:l.permissions.length)?n.multipleSelect=!0:n.multipleSelect=!1});const y=r=>{r.target.checked===!1?e.permissions=[]:t.permissions.forEach(s=>{e.permissions.push(s.id)})},k=()=>{t.permissions.length==e.permissions.length?n.multipleSelect=!0:n.multipleSelect=!1};return(r,s)=>(f(),p("section",q,[o(D,{show:t.show,onClose:s[4]||(s[4]=l=>c("close"))},{default:u(()=>[i("form",{class:"p-6",onSubmit:j(g,["prevent"])},[A,i("div",L,[i("div",null,[o(m,{for:"name",value:"Name"}),o(F,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:a(e).name,"onUpdate:modelValue":s[0]||(s[0]=l=>a(e).name=l),required:"",placeholder:"Role Name"},null,8,["modelValue"]),o(h,{class:"mt-2",message:a(e).errors.name},null,8,["message"])]),i("div",null,[o(m,{value:"Permission"}),o(h,{class:"mt-2",message:a(e).errors.permissions},null,8,["message"]),i("div",P,[o(M,{id:"permission-all",checked:n.multipleSelect,"onUpdate:checked":s[1]||(s[1]=l=>n.multipleSelect=l),onChange:y},null,8,["checked"]),o(m,{for:"permission-all",value:"Check all"})]),i("div",R,[(f(!0),p(C,null,$(t.permissions,(l,d)=>(f(),p("div",{class:"flex items-center justify-start space-x-2",key:d},[N(i("input",{onChange:k,class:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary shadow-sm focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-gray-800",type:"checkbox",id:"permission_"+l.id,value:l.id,"onUpdate:modelValue":s[2]||(s[2]=b=>a(e).permissions=b)},null,40,T),[[B,a(e).permissions]]),o(m,{for:"permission_"+l.id,value:l.name},null,8,["for","value"])]))),128))])])]),i("div",G,[o(O,{disabled:a(e).processing,onClick:s[3]||(s[3]=l=>c("close"))},{default:u(()=>[_(" Close ")]),_:1},8,["disabled"]),o(U,{class:V(["ml-3",{"opacity-25":a(e).processing}]),disabled:a(e).processing,onClick:g},{default:u(()=>[_(E(a(e).processing?"Save...":"Save"),1)]),_:1},8,["class","disabled"])])],40,z)]),_:1},8,["show"])]))}};export{W as default};