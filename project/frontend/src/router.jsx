import { createBrowserRouter } from "react-router-dom";
import Login from "./pages/login";
import Signup from "./pages/signup";
import Users from "./pages/Users";
import Notfound from "./pages/Notfound";
import App from "./App";
import Acceuill from './pages/Acceuill'
import Profil from './pages/Profil'
import Ajout_User from "./pages/Ajout_User";
import Edit_user from "./pages/Edit_user";
import Protected from "./components/protected";

export const router=createBrowserRouter([
    {
      path:'/',
      element:<App/>,
      children:[
        {
            index: true,
            element:
                <Acceuill />
         },
         {
            path:'/users',
            element:<Acceuill/>
        },
        {
            path:'/Add_new',
            element:<Ajout_User/>
        },
        {
            path:'/edit/:id',
            element:<Edit_user/>
        },
        {
            path:'/profile',
            element:<Profil/>
        }

      ]
    },
    {
        path:'/signup',
        element:<Signup/>
    },
    {
        path:'/login',
        element:<Login/>
    },
    {
        path:'*',
        element:<Notfound/>
    }
  


])
