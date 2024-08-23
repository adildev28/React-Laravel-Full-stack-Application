import { Outlet } from 'react-router-dom';
import Sidebar from './components/Sidebar';
import Footer from './components/Footer';
function App() {

  return (
    <div >
      <div className='flex mb-0'>
      <Sidebar/>
      <Outlet/>  
      </div>
      <Footer/>  
 
      
    </div>
  )
}

export default App
