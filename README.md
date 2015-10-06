# liquidfridge.co.za



## Configuration

Create configuration file `/ops/ops.conf` with:

```
#!/usr/bin/env bash

G_USER=""                                               # User
G_GROUP=""                                              # Group
G_UID=""                                                # User ID
G_GID=""                                                # Group ID

G_MODE="prod"                                           # Mode: dev, prod

G_PUBLIC_ROOT="${HOME}/public_html"
```



## Installation

Run install:

```
cd /ops && bash ops.sh install
```
