import React,{useState} from 'react';


const Sidebar = () => {
    const [user,setUser]=useState();
  return (
    <div className='bg-gradient-to-t from-purple-600 to-purple-400 h-screen my-0 py-10 w-1/5   '>
        <a href="/Profile">
        <div className='grid justify-around items-start  border-gray-200 rounded-md my-5 mx-2 p-2 bg-white bg-opacity-55'>

            <img className='border border-purple-700 rounded-full w-24 h-24' src="./user.jpg" alt="" />
            <h3 className='font-bold text-center pt-4 underline'>user Name</h3>
            <p className=' text-sm text-center text-purple-700 bg-white mt-1'>user Role</p>            
        </div>
        </a>
        <a href="/users"> <li className='border-white border border-x-0 px-4 py-2 list-none font-bold text-center bg-white bg-opacity-10 mt-10 text-white hover:bg-opacity-55 hover:border-black '>users</li></a>
        <a href="/add_new"> <li className='border-white border  border-x-0 px-4 py-2 list-none font-bold text-center bg-white bg-opacity-10 text-white hover:bg-opacity-55  hover:border-black'>+ Add New User</li></a>
    </div>
  )
}

export default Sidebar