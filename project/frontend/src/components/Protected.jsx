import React from 'react';
import { Navigate } from 'react-router-dom';

const Protected = ({ children }) => {
    const token = localStorage.getItem('token'); // Check if token exists in localStorage

    // If the user is not authenticated, redirect to login
    return token ? children : <Navigate to="/login" />;
};

export default Protected