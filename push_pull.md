Pour envoyer du code à GitHub en tant que collaborateur, vous devez suivre ces étapes :

1. Assurez-vous d'avoir été invité au référentiel en tant que collaborateur.
2. Clonez le référentiel sur votre ordinateur local.
3. Créez une branche pour vos modifications.
4. Apportez vos modifications au code.
5. Validez vos modifications.
6. Envoyez vos modifications au référentiel distant.

Voici les étapes détaillées :

1. Pour vérifier si vous avez été invité au référentiel en tant que collaborateur, rendez-vous sur la page du référentiel sur GitHub et cliquez sur l'onglet **Paramètres**. Dans la section **Collaborateurs**, vous verrez une liste de tous les collaborateurs, y compris vous. Si votre nom ne figure pas dans la liste, vous n'avez pas été invité à collaborer sur le référentiel.
2. Pour cloner le référentiel sur votre ordinateur local, ouvrez une fenêtre de terminal et accédez au répertoire dans lequel vous souhaitez cloner le référentiel. Ensuite, exécutez la commande suivante :

```
git clone https://github.com/<username>/<repository-name>
```

Remplacez `<username>` par le nom d'utilisateur de la personne qui possède le référentiel et `<repository-name>` par le nom du référentiel.

3. Pour créer une branche pour vos modifications, exécutez la commande suivante :

```
git checkout -b <branch-name>
```

Remplacez `<branch-name>` par le nom de votre branche.

4. Pour apporter vos modifications au code, ouvrez les fichiers dans votre référentiel local et apportez les modifications souhaitées.

5. Pour valider vos modifications, exécutez la commande suivante :

```
git add .
git commit -m "<commit-message>"
```

Remplacez `<commit-message>` par un message décrivant vos modifications.

6. Pour envoyer vos modifications au référentiel distant, exécutez la commande suivante :

```
git push origin <branch-name>
```

Remplacez `<branch-name>` par le nom de votre branche.

Une fois que vous avez poussé vos modifications vers le référentiel distant, le propriétaire du référentiel pourra examiner vos modifications et les fusionner dans la branche principale.

Voici quelques éléments supplémentaires à garder à l'esprit :

* Si vous apportez des modifications à un grand référentiel, il est judicieux de créer une branche distincte pour chaque fonctionnalité ou correction de bogue. Cela aidera à garder vos modifications organisées et facilitera leur fusion dans la branche principale.
* Lorsque vous validez vos modifications, il est important d'ajouter un message de validation descriptif. Cela aidera le propriétaire du référentiel à comprendre quelles sont vos modifications et pourquoi vous les avez apportées.
* Si vous ne savez pas comment utiliser Git, de nombreuses ressources sont disponibles en ligne. Vous pouvez également trouver de l'aide auprès de la communauté GitHub.
