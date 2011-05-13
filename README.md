# Outbound Flows for OpenVBX

This plugin allows you to call out using flows or trigger outgoing calls or texts within another flow.

## Installation

[Download][1] the plugin and extract to /plugins

[1]: https://github.com/chadsmith/OpenVBX-Plugin-Outbound/archives/master

## Usage

Once installed, OUTBOUND will appear in the OpenVBX sidebar

### Call out with a Flow

1. Click Start Flow in the OpenVBX sidebar
2. Enter the number to call
3. Select the Flow to call with
4. Select the caller ID (OpenVBX number) to call with

### Trigger a call to another number from a Flow

1. Add the New Call applet to a Call or SMS flow
2. Select the caller ID (OpenVBX number) to call with
3. Select the Flow to call with
4. Enter the number to call

### Trigger an SMS to another number from a Flow

1. Add the New Text applet to a Call or SMS flow
2. Select the caller ID (OpenVBX number) to call with
3. Enter the number to text
3. Enter the message to text*

`* Use %caller% or %sender% to substitute the caller's number, %number% for the number called or %body% for the message body`
