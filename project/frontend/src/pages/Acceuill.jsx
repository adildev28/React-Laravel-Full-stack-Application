import React from 'react'
import './CSS/acceuill.css';
import UserCard from '../components/UserCard';


const Acceuill = () => {
  const users= [
    {
      nom:"Adil",
      email:"adil@gmail.com",
      photo:"./user.jpg",
      id:1
    },
    {
      nom:"ilyass",
      email:"ilyass@gmail.com",
      photo:"./user.jpg",
      id:2
    },
    {
      nom:"sofiane",
      email:"sofiane@gmail.com",
      photo:"./user.jpg",
      id:3
    },
    {
      nom:"mahdi",
      email:"mahdi@gmail.com",
      photo:"./user.jpg",
      id:4
    }
  ]
  return (
    <div className='w-full m-4 mt-10 mb-0 p-4 pb-0  '>
      <h3 className='capitalize font-semibold text-left text-2xl p-6 pb-2 '>users list</h3>
      <hr className='mb-10 pb-6' />
    <div className=' h-96 overflow-y-scroll'>
      <table className='w-full border-2'>
        <thead className='bg-gray-200 h-20'>
          <tr >
            <th className='table-cell text-left p-2'>image</th>
            <th className='table-cell text-left p-2'>Nom</th>
            <th className='table-cell text-left p-2'>email</th>
            <th className='table-cell text-left p-2'>actions</th>
          </tr>

        </thead>
        <tbody className=''>
        {users.map((user,i)=>(
           <tr className='border-b-2 border-white bg-gray-100 p-6'>
            <td className='p-2'> <img src={user.photo} alt={user.nom} className='h-12 w-12' /> </td>
           <td className='p-2'>{user.nom}</td>
            <td className='p-2'>{user.email} </td>
             <td className='p-2'>
              <a href={'edit/'+user.id} className='p-6 py-3 bg-blue-500 font-semibold text-white rounded-md mr-2' >Edit</a>
              <button className='p-6 py-3 bg-red-500 font-semibold text-white rounded-md' >Delete</button>
               </td>
            </tr>
         ))}           
        </tbody>
             
      </table>      
    </div>




    </div>
  )
}

export default Acceuill