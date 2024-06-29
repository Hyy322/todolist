<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .task-list {
            list-style-type: none;
            padding: 0;
        }

        .task-list li {
            background: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-list li:nth-child(even) {
            background: #f1f1f1;
        }

        .task-actions {
            display: flex;
            gap: 10px;
        }

        .task-actions form {
            display: inline;
        }

        .task-actions button,
        .task-actions a {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 15px;
        }

        .task-actions button:hover,
        .task-actions a:hover {
            background: #0056b3;
        }

        .create-task {
            display: block;
            text-align: center;
            margin: 20px 0;
            background: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .create-task:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>

        <a href="{{ route('tasks.create') }}" class="create-task">Create Task</a>

        @if ($message = Session::get('success'))
            <div class="success-message">
                <p>{{ $message }}</p>
            </div>
        @endif

        <ul class="task-list">
            @foreach ($tasks as $task)
                <li>
                    {{ $task->name }}
                    <div class="task-actions">
                        <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
