<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerEAhRMuv\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerEAhRMuv/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerEAhRMuv.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerEAhRMuv\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerEAhRMuv\App_KernelDevDebugContainer([
    'container.build_hash' => 'EAhRMuv',
    'container.build_id' => '978be3c2',
    'container.build_time' => 1611496079,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerEAhRMuv');
