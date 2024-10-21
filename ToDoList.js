import React, { useState } from 'react';

const TodoApp = () => {
    const [tasks, setTasks] = useState([]);
    const [taskInput, setTaskInput] = useState('');

    const addTask = () => {
        if (taskInput) {
            setTasks([...tasks, { text: taskInput, completed: false }]);
            setTaskInput('');
        }
    };

    const toggleTaskCompletion = (index) => {
        const newTasks = tasks.map((task, i) => 
            i === index ? { ...task, completed: !task.completed } : task
        );
        setTasks(newTasks);
    };

    const deleteTask = (index) => {
        const newTasks = tasks.filter((_, i) => i !== index);
        setTasks(newTasks);
    };

    return (
        <div>
            <h1>To-Do List</h1>
            <input 
                type="text" 
                value={taskInput} 
                onChange={(e) => setTaskInput(e.target.value)} 
                placeholder="Add a new task"
            />
            <button onClick={addTask}>Add Task</button>
            <ul>
                {tasks.map((task, index) => (
                    <li key={index} style={{ textDecoration: task.completed ? 'line-through' : 'none' }}>
                        {task.text}
                        <button onClick={() => toggleTaskCompletion(index)}>Toggle</button>
                        <button onClick={() => deleteTask(index)}>Delete</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default TodoApp;
