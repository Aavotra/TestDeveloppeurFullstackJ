<?php

class Task
{
    private string $name;
    private string $project;
    private int $priority; 
    private bool $isBlocked;
    private ?string $blockReason;

    public function __construct(string $name,string $project,int $priority,bool $isBlocked = false,?string $blockReason = null) 
    {
        $this->name = $name;
        $this->project = $project;
        $this->priority = $priority;
        $this->applyBlockValidation($isBlocked, $blockReason);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getProject(): string
    {
        return $this->project;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function isBlocked(): bool
    {
        return $this->isBlocked;
    }

    public function getBlockReason(): ?string
    {
        return $this->blockReason;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setProject(string $project): void
    {
        $this->project = $project;
    }

    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    public function setBlocked(bool $isBlocked, ?string $blockReason = null): void 
    { 
        $this->applyBlockValidation($isBlocked, $blockReason); 
    }

    private function applyBlockValidation(bool $isBlocked, ?string $blockReason): void 
    { 
        if ($isBlocked && (is_null($blockReason) || trim($blockReason) === '')) 
        { 
            throw new InvalidArgumentException("Une tâche bloquée doit avoir une raison de  blockage!"); 
        } 
        $this->isBlocked = $isBlocked; 
        $this->blockReason = $blockReason; 
    }
 
}

class TaskService
{

    public static function getSortedBlockedTasks(array $tasks): array
    {
        $blockedTasks = array_filter($tasks, fn(Task $task) => $task->isBlocked());

        usort($blockedTasks, function (Task $task1, Task $task2) {
            return $task1->getPriority() <=> $task2->getPriority() ?: strcmp($task1->getName(), $task2->getName());
        });

        return $blockedTasks;
    }
}


$tasks = [
    new Task("Rédiger le rapport", "Projet Alpha", 2, true, "Attente validation"),
    new Task("Préparer la présentation", "Projet Beta", 1, false),
    new Task("Corriger les bugs", "Projet Alpha", 3, true, "Blocage technique"),
    new Task("Organiser la réunion", "Projet Gamma", 1, true, "Salle indisponible"),
    new Task("Mettre à jour la documentation", "Projet Beta", 2, false),
];

$blockedTasks = TaskService::getSortedBlockedTasks($tasks);

echo "<h3>Tâches initiales :</h3>";
echo "<ul>";
foreach ($tasks as $task) {
    echo "<li>";
    echo "{$task->getName()} (Projet: {$task->getProject()}, Priorité: {$task->getPriority()}, Raison: {$task->getBlockReason()})";
    echo "</li>";
}
echo "</ul>";

echo "<h3>Tâches bloquées triées :</h3>";
echo "<ul>";
foreach ($blockedTasks as $task) {
    echo "<li>";
    echo "{$task->getName()} (Projet: {$task->getProject()}, Priorité: {$task->getPriority()}, Raison: {$task->getBlockReason()})";
    echo "</li>";
}
echo "</ul>";
